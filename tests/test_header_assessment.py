"""Offline evidence assessor regression tests. Run python3 -m unittest discover -s tests -p 'test_header_assessment.py'."""
import importlib.util
import pathlib
import unittest

FILE = pathlib.Path(__file__).resolve().parents[1] / "scripts" / "assess_http_headers.py"
spec = importlib.util.spec_from_file_location("assess_http_headers", FILE)
mod = importlib.util.module_from_spec(spec)
spec.loader.exec_module(mod)

class HeaderAssessmentTests(unittest.TestCase):
    def test_missing_headers(self):
        result = mod.assess("HTTP/1.1 200 OK\r\nServer: Example\r\n\r\n")
        self.assertEqual([x["status"] for x in result["findings"]], ["not_observed"] * 3)
    def test_present_headers(self):
        raw = ("HTTP/2 200\nStrict-Transport-Security: max-age=31536000\n"
               "Content-Security-Policy: default-src 'self'\nX-Content-Type-Options: nosniff\n\n")
        self.assertTrue(all(x["status"] == "observed_review_configuration" for x in mod.assess(raw)["findings"]))
    def test_malformed(self):
        with self.assertRaises(ValueError):
            mod.assess("not an HTTP response")
    def test_folded_header_rejected(self):
        with self.assertRaises(ValueError):
            mod.assess("HTTP/1.1 200 OK\nX-Test: a\n continuation\n")
    def test_size_limit(self):
        with self.assertRaises(ValueError):
            mod.assess("HTTP/1.1 200 OK\n" + "A" * 66000)

if __name__ == "__main__":
    unittest.main()
