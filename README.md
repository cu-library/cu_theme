# Carlton University Theme

This theme was built off of the drupal contrib [Adaptive Theme](https://www.drupal.org/project/adaptivetheme)

Installing this themes requirements for further development only requires the following commands.

* gem install bundler
* bundle install

The Gemfile.lock outlines this themes requirements as:

* gem "sass", "~> 3.4.9"
* gem "compass", "~> 1.0.1"
* gem "ffi", "1.9.3"
* gem "zen-grids", "~> 2.0"

To compile the CSS, run "compass compile" in the theme directory. To 'watch' the directory for changes, run 'compass watch'. To clean
css, run 'compass clean'.
