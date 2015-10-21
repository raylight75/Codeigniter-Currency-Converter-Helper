### Codeigniter-currency-converter V 1.0.0
A Codeigniter Helper to convert your price from database from a currency to another

### Background

Is very frequently that inside your sites you need to convert your price from a currency to another.
You need to have valid database connection and tables to use this helper.
First set link in your site with
```sh
<a href="<?php echo base_url() ?>home/set_currency/usd or eur or bgn">
```
Then this helper simply set the name of the currency in session data like - $this->session->set_userdata('set_currency', $currency);
You need function in some controller to set data - Example:
```sh
public function set_currency($currency = "")
 $   {
 $      $currency = ($currency != "") ? $currency : "usd";
        $this->session->set_userdata('set_currency', $currency);
        redirect(base_url());
    }
```
In the end just call helper in view like:
```sh
<?php echo currency($row->price);?> <?php echo label();?>
```
### Requirements

CodeIgniter 2.x, 3.x
PHP 5.2 or gretaer

Installation
Drag and drop the currency_helper.php in into your application directories. Load it from your application/config/autoload.php using:
```sh
$autoload['helper'] = array('currency');
```
Simple Usage:

If helper is loaded in autoload you can use it in evere view file like:
```sh
<?php echo currency($row->price);?> <?php echo label();?>
```
where we have data from database in this example object $row->price and <?php echo label();?> thath call helper function to display currency
label from session
