<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel-test
<blockquote>
<b>Headers*</b>: <br>
&nbsp&nbsp&nbsp&nbsp&nbsp<i>Accept: application/json</i><br>
&nbsp&nbsp&nbsp&nbsp&nbsp<i>Content-Type: application/json</i><br>
<small>* used for all requests</small>
</blockquote>
<br>

<p>
<b>URL</b>: /api/auth/register <br>
<b>METHOD</b>: POST
</p>

Request example:
<blockquote>
<i>POST http://localhost/api/auth/register</i>
<br>
<i>{"login":"test4","password":"password"}</i><br>
</blockquote>


<br>
<p>
<b>URL</b>: /api/auth/login <br>
<b>METHOD</b>: POST
</p>

Request example:
<blockquote>
<i>POST http://localhost/api/auth/login</i>
<br>
<i>{"login":"test","password":"password"}</i>
<br>
</blockquote>



<br>
<p>
<b>URL</b>: /api/clients <br>
<b>METHOD</b>: POST
</p>

Request example:
<blockquote>
<i>POST http://localhost/api/clients</i>
<br>
<i>{"key":"lastname","value":"Dou"}</i>
<br>
</blockquote>


<br>
<p>
<b>URL</b>: /api/clients <br>
<b>METHOD</b>: PUT
</p>

Request example:

<blockquote>
<i>PUT http://localhost/api/clients</i>
<br>
<i>{"lastname":"Ann+", "Age":"21"}</i>
<br>
</blockquote>



<br>
<p>
<b>URL</b>: /api/clients <br>
<b>METHOD</b>: DELETE
</p>

Request example:
<blockquote>
<i>DELETE http://localhost/api/clients</i>
<br>
<i>{"key":"lastname"}</i>
<br>
</blockquote>



<br>
<p>
<b>URL</b>: /api/clients <br>
<b>METHOD</b>: GET
</p>

Request example:
<blockquote>
<i>GET http://localhost/api/clients?lastname,firstname</i>
</blockquote>
