# utf8encoder
Simple PHP class to easily UTF-8 encode values and variables of any type.

# Requirements
- This class uses <i>mbstring</i> which is a non-default extension. This means it is not enabled by default. You must explicitly enable the module with the <i>--enable-mbstring</i> configure option.
- Note: <i>mbstring</i> is built into Apache 2's PHP5 library, <i>libapache2-mod-php5</i>. 