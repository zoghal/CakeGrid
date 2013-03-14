      _____      _           _____      _     _ 
     / ____|    | |         / ____|    (_)   | |
    | |     __ _| | _____  | |  __ _ __ _  __| |
    | |    / _` | |/ / _ \ | | |_ | '__| |/ _` |
    | |___| (_| |   <  __/ | |__| | |  | | (_| |
     \_____\__,_|_|\_\___|  \_____|_|  |_|\__,_| 2.3


# CakeGrid 2.3

CakeGrid Plugin is DataGrid Tables for CakePHP + GUI 


## Demo
![DataGrid Demo](http://soozanchi.ir/rita1/cakegird.png)
![demo](http://soozanchi.ir/rita1/cakegrid2.png)
   
## Requirements

* CakePHP 2.2.x+
* PHP5


## Installation
For CakePHP 1.3 support, please see the [1.3 branch](https://github.com/bobbytables/CakeGrid).


_[Manual]_

* Download this: [https://github.com/zoghal/CakeGrid/tree/master](https://github.com/zoghal/CakeGrid/tree/master)
* Unzip that download.
* Copy the resulting folder to `app/Plugin`
* Rename the folder you just copied to `Upload`

_[GIT Submodule]_

In your app directory type:

	git submodule add -b master https://github.com/zoghal/CakeGrid.git
	git submodule init
	git submodule update


[GIT Clone]_

In your `Plugin` directory type:

	git clone -b master https://github.com/zoghal/CakeGrid.git CakeGrid

### Enable plugin

In 2.0 you need to enable the plugin your `app/Config/bootstrap.php` file:

	CakePlugin::load('CakeGrid');

If you are already using `CakePlugin::loadAll();`, then this is not necessary.

## Usage

In your controller (or for global usage include it in your AppController) include the helper by adding this line:

	<?php
	class PagesController extends AppController {
	
    	public $helpers = array('CakeGrid.Grid');
	
		public function admin_index() {
	
			$this->set('Results', $this->paginate('Page') );
		
		}
	}

In your view file you can now create grids easily by doing something like this:

	<?php 
		$this->Grid->addColumn( __('شناسه'), "/Page/code",array('width' => '25%'));
		$this->Grid->addColumn( __('نام', "/Page/name",array('width' => '20%'));
		$this->Grid->addColumn( __('عنوان'), "/Page/title",array('width' => '20%'));
		$this->Grid->addColumn(__('وضعیت'), "/Page/status",array('width' => '10%' ,'element' => 'status'));

		$this->Grid->addAction(__('ویرایش'), array( 'controller' => 'posts' , 'action' => 'edit' ), array("/Page/id"));
		$this->Grid->addAction(__('حذف'), array('controller' => 'posts' ,  'action' => 'delete'), array("/Page/id"),array('confirm' => __('آیا مطمئن هستید؟'),'type' => 'postLink'));
		
		echo $this->Grid->generate($Results);
		    
	?>	
		

    
This will create a 4 column grid (including actions) for all of your orders or whatever you like!
CakeGrid uses the Set::extract format found here: http://book.cakephp.org/view/1501/extract

If you're generating multiple tables per view, reset the grid and start over after you've generated your result set:

    $this->Grid->reset();
    
# Actions Column

    @param string $name 
    @param array $url 
    @param array $trailingParams
    @param array $options
    
	$this->Grid->addAction(
		__('حذف'), 
		array( 'controller' => 'posts' , 'action' => 'delete'), 
 		array("/Page/id"),
		array('confirm' => __('آیا مطمئن هستید؟'),'type' => 'postLink')
	);
		
    
## What this does:

The First parameter if the link text (Edit, Delete, Rename, etc..)
The Second parameter is the controller action that will be handling the action.
The Third parameter is for the action parameters. So the id of the result, maybe a date? Whatever. Use your imagination.


# Advanced Functionality

CakeGrid allows you to make column results linkable. For example, if a column is for the order number, you can make the result a link to the actual order details.

For example:

    $this->Grid->addColumn('ID', '/Page/id', array('linkable' => array(
    	'url' => array('action' => 'details'),
    	'trailingParams' => array('/Page/id')
    )));
    
Linkable is the option parameter takes 3 sub options. url, trailingParams, and Html::link options (see http://book.cakephp.org/view/1442/link)

The url could be considered the controller and action, and maybe a named parameter. The trailing parameters is the id or whatever you like. It will be pulled from the result.
__Note:__ Named parameters are not yet supported, but so array('named' => array('id' => '/Page/id')) will not work, but array('id' => '/Page/id') will

## Total Row

To create a "totals" row. You can set a column to total. Only money and numbers will work (obviously).

The syntax is as follows:

    $this->addColumn('Amount', '/Page/amount', array('total' => true));
    
This will produce a final row with the totals on it for the column. If the column type is set to money or number, it will format the totals as well.

## Concat and Format

CakeGrid allows you to do concatenation and sprintf formatting on your cells. For example, if you have a first and last name but don't want to use CakePHP's virtualFields to merge them together, you can use CakeGrid to do it.

### Concat

    $this->Grid->addColumn('User', array(
    	'type' => 'concat', 
    	'/User/first_name',
    	'/User/last_name'
    ));
    
This will output in the cell the users first and last name together. Concat uses spaces as the default separator but can be changed in 2 ways.
    
    // Inline with the column options
    $this->Grid->addColumn('User', array(
    	'type' => 'concat', 
    	'separator' => ' ',
    	'/User/first_name',
    	'/User/last_name'
    ));
    
    // Global usage
    $this->Grid->options(array(
        'separator' => ' '
    ));
    
### Formatting

    $this->Grid->addColumn('Register Date', array(
        'type' => 'format',
        'with' => '%s (%s)',
        '/User/created',
        '/User/register_ip'
    ));

###  Width 
		$this->Grid->addColumn( __('عنوان'), "/Page/title",array('width' => '20%'));

## Elements

CakeGrid allows the usage of your own elements to be used in cells. This is useful if you're wanting to use a hasMany relationship into a dropdown or something similar.
When using an element, a valuePath is not used. CakeGrid will pass the entire result of the row to the element.

For Example:

		$this->Grid->addColumn(__('وضعیت'), "/Page/status",array('width' => '10%' ,'element' => 'status'));    
Whatever the result is for the current row will get passed to the element as $result.

So in your element (/Elements/table/status.ctp for example)

		<?php 
			$i = ($result == true) ?  'icons/icon_accept.png' :  'icons/stop.png' ; ?>
			$link = (isset($options['link']))? $options['link'] : false;
		?>
		<center>
		    <?php echo $this->Html->image($i,array('data-link' =>$link, 'id' => '')); ?>
		</center>
		

##License

 Copyright (c) 2011 The Daily Save, LLC.  All rights reserved.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.