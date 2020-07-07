#!/usr/bin/python
text = raw_input("input: ")
octal = ""
for c in text:
        octal += "\\"
        octrep = oct(ord(c))[1:]  # octal numbers are prepended by a zero,
                                  # but since this will be a string not a
                                  # number we don't want that.
        octrep = "0" * (3-len(octrep)) + octrep  # pad with preceeding 0s
        octal += octrep

print octal