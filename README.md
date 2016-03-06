# learn-kahlan

[![Build Status](https://travis-ci.org/sitrunlab/learn-kahlan.svg)](https://travis-ci.org/sitrunlab/learn-kahlan)

Consume
-------

```bash
$ git clone https://github.com/sitrunlab/learn-kahlan.git
$ cd learn-kahlan
$ composer install
$ bin/kahlan --coverage=4 --reporter=verbose
```

Get Html Report
---------------
```
$ npm install -g istanbul
$ ./bin/kahlan --istanbul="coverage.json"
$ istanbul report
```

or

```
$ brew install lcov
$ mkdir lcov
$ ./bin/kahlan --lcov="lcov/coverage.info"
$ cd lcov
$ genhtml coverage.info
```
