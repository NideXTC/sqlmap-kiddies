#!/usr/bin/env python

"""
Copyright (c) 2006-2013 sqlmap developers (http://sqlmap.org/)
See the file 'doc/COPYING' for copying permission
"""

import json
import pickle
import sys

from lib.core.settings import IS_WIN
from lib.core.settings import UNICODE_ENCODING

def base64decode(value):
    return value.decode("base64")

def base64encode(value):
    return value.encode("base64")[:-1].replace("\n", "")

def base64pickle(value):
    retVal = None
    try:
        retVal = base64encode(pickle.dumps(value, pickle.HIGHEST_PROTOCOL))
    except:
        warnMsg = "problem occurred while serializing "
        warnMsg += "instance of a type '%s'" % type(value)
        singleTimeWarnMessage(warnMsg)

        retVal = base64encode(pickle.dumps(str(value), pickle.HIGHEST_PROTOCOL))
    return retVal

def base64unpickle(value):
    return pickle.loads(base64decode(value))

def hexdecode(value):
    value = value.lower()
    return (value[2:] if value.startswith("0x") else value).decode("hex")

def hexencode(value):
    return utf8encode(value).encode("hex")

def unicodeencode(value, encoding=None):
    """
    Return 8-bit string representation of the supplied unicode value:

    >>> unicodeencode(u'test')
    'test'
    """

    retVal = value
    if isinstance(value, unicode):
        try:
            retVal = value.encode(encoding or UNICODE_ENCODING)
        except UnicodeEncodeError:
            retVal = value.encode(UNICODE_ENCODING, "replace")
    return retVal

def utf8encode(value):
    return unicodeencode(value, "utf-8")

def utf8decode(value):
    return value.decode("utf-8")

def htmlescape(value):
    codes = (('&', '&amp;'), ('<', '&lt;'), ('>', '&gt;'), ('"', '&quot;'), ("'", '&#39;'), (' ', '&nbsp;'))
    return reduce(lambda x, y: x.replace(y[0], y[1]), codes, value)

def htmlunescape(value):
    retVal = value
    if value and isinstance(value, basestring):
        codes = (('&lt;', '<'), ('&gt;', '>'), ('&quot;', '"'), ('&nbsp;', ' '), ('&amp;', '&'))
        retVal = reduce(lambda x, y: x.replace(y[0], y[1]), codes, retVal)
    return retVal

def singleTimeWarnMessage(message):  # Cross-linked function
    pass

def stdoutencode(data):
    retVal = None

    try:
        # Reference: http://bugs.python.org/issue1602
        if IS_WIN:
            output = data.encode('ascii', "replace")

            if output != data:
                warnMsg = "cannot properly display Unicode characters "
                warnMsg += "inside Windows OS command prompt "
                warnMsg += "(http://bugs.python.org/issue1602). All "
                warnMsg += "unhandled occurances will result in "
                warnMsg += "replacement with '?' character. Please, find "
                warnMsg += "proper character representation inside "
                warnMsg += "corresponding output files. "
                singleTimeWarnMessage(warnMsg)

            retVal = output
        else:
            retVal = data.encode(sys.stdout.encoding)
    except:
        retVal = data.encode(UNICODE_ENCODING)

    return retVal

def jsonize(data):
    return json.dumps(data, sort_keys=False, indent=4)
