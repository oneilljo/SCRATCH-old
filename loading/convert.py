#!/usr/bin/env python
# -*- coding: UTF-8 -*-

import cgitb
import kurt
import sys

p = kurt.Project.load(str(sys.argv[1]));
p.convert("scratch14");
p.save();
