jQuery.equalHeightChildren
==========================

Simple jQuery plugin for making the children of an element of equal heights row by row (children element belonging to the same row will take the maximum height of that row)

Description
=================================
I came accross this plugin which makes all the marked elements of equal height.
https://github.com/mattbanks/jQuery.equalHeights
I needed something that can target all the children of an element and also match heights row by row (a group of child are considered to be on the same row if they have same 'top' value).

How to use
===========
if your markup is
```html
	<div class="parent">
	    <div>...</div>
	    <div>...</div>
	    <div>...</div>
	    <div>...</div>
	    <div>...</div>
	    <div>...</div>
	</div>
```
then you just need to add the attribute 

	data-equal-height-children

to the parent element
```html
	<div class="parent" data-equal-height-children>
		...
		...
	</div>
```
of course you'll have to include jQuery and this plugin jquery.equalHeightChildren.js
with something like
```html
	<script src="path/to/jquery.min.js"></script>
	<script src="path/to/jquery.equalHeightChildren.js"></script>
```
You can use index.html as an example. Visit the following link for a demo
	http://afzalh.github.io/jQuery.equalHeightChildren

That's all
