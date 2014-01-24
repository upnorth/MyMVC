<?php
/**
* Helpers for the template file.
*/
if(!isset($mvc->data['title'])){$mvc->data['title'] = 'MyMVC';}
if(!isset($mvc->data['header'])){$mvc->data['header'] = '<h1>Header: MyMVC</h1>';}
if(!isset($mvc->data['main'])){$mvc->data['main'] = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';}
if(!isset($mvc->data['footer'])){$mvc->data['footer'] = '<p>Footer: &copy; MyMVC by Karl Olofsson, based on Lydia by Mikael Roos (mos@dbwebb.se)</p>';}
