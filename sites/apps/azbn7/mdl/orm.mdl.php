<?php

namespace app;

use \RedBeanPHP\R as R;

class ORM
{
	
	public $event_prefix = '';
	
	public function __construct()
	{
		$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
	}
	
	public function build($type = '')
	{
		return R::xdispense($type);
	}
	
	public function save($item)
	{
		return R::store($item);
	}
	
	public function create($type = '', $params = array())
	{
		
		$item = $this->build($type);
		
		if(count($params)) {
			foreach($params as $p_k => $p_v) {
				$item->$p_k = $p_v;
			}
		}
		
		$item_id = $this->save($item);
		
		return $item;
		
	}
	
	/*
	
	$shop = R::dispense( 'shop' );
    $shop->name = 'Antiques';
	$vase = R::dispense( 'product' );
    $vase->price = 25;
    $shop->ownProductList[] = $vase
    R::store( $shop );
	
	 $shop = R::load( 'shop', $id );
    $first = reset( $shop->ownProductList ); //gets first product
    $last = end( $shop->ownProductList ); //gets last product
    foreach( $shop->ownProductList as $product ) {...} //iterate
	
	
	 //remove one product by its ID
    unset( $store->ownProductList[$id] );

    //remove all
    $store->ownProductList = array();
    R::store( $shop );
	
	
	$shop->xownProductList = array();
    R::store( $shop );
	
	
	
	$cane = R::dispense('cane', 10);
		$cane[1]->ownCane = [ $cane[2], $cane[9] ];
		$cane[2]->ownCane = [ $cane[3], $cane[4] ];
		$cane[4]->ownCane = [ $cane[5], $cane[7], $cane[8] ];
		$cane[5]->ownCane = [ $cane[6] ];
		$id = R::store( $cane[1] );
		$root = R::load('cane', $id);
		return $root->ownCane[2]->ownCane[4]->ownCane[5]->ownCane[6]->id;
	
	
	
	
	$page = R::dispense('page');
		$page->title = 'chapter';
		$page2 = R::dispense('page');
		$page2->title = 'article';
		$page3 = R::dispense('page');
		$page3->title = 'text';
		$page->ownPageList[] = $page2;
		$page2->ownPageList[] = $page3;
		R::store($page);
		$p = $page3->fresh();
		$p->traverse('page', function($parent) use ( &$todos ) {
				echo $parent->title. PHP_EOL;
		});
	
	
	
	$bean->getMeta( 'type' );
	$bean->setMeta( 'my.secret.property', 'secret' );
	
	
	$book = R::xdispense($type);
	list($book, $page) = R::dispenseAll('book,page');
	$book = R::load( 'book', $id ); //reloads our book
	R::load('bean', 1, 'LOCK IN SHARED MODE'); 
	$books = R::loadAll( 'book', $ids );
	R::store( $book );
	$bean = $bean->fresh();
	$book  = R::find( 'book', ' rating > 4 ');
	$books = R::find( 'book', ' title LIKE ? ', [ 'Learn to%' ] );
	$promotions = R::find( 'person', ' contract_id IN ('.R::genSlots( $contractIDs ).')', $contractIDs );
	$book  = R::findOne( 'book', ' title = ? ', [ 'SQL Dreams' ] );
	$books = R::findAll( 'book' , ' ORDER BY title DESC LIMIT 10 ' )
	$books  = R::find( 'book', ' rating < :rating ', [ ':rating' => 2 ] );
	$numOfBooks = R::count( 'book', ' pages > ? ', [ 250 ] );
	R::tag( $page, array( 'topsecret', 'mi6' ) );
	$tags = R::tag( $page ); //returns array with tags
	R::untag( $bean, $tagListArray );
	R::hasTag( $bean, $tags, $all = FALSE )
	R::addTags( $page, ['funny', 'hilarious'] );
	
	$collection = R::findCollection( 'page', ' ORDER BY content ASC LIMIT 5 ' );
	while( $item = $collection->next() ) {
		
	}
	
	
	R::findLike( 'flower', [ 'color' => ['yellow', 'blue'] ], ' ORDER BY color ASC ' );
	
	
	$book = R::findOrCreate( 'book', [ 'title' => 'my book', 'price' => 50] );
	
	
	$beans = R::findMulti( 'book,page', '
        SELECT book.*, page.* FROM book
        INNER JOIN page.book_id = book.id
        WHERE book.category = ?
    ', [ $cat] );
	
	
	R::exec( 'UPDATE page SET title="test" WHERE id = 1' );
	
	
	R::getAll( 'SELECT * FROM page' );
	
	
	R::getAll( 'SELECT * FROM page WHERE title = :title',
        [':title' => 'home']
    );
	
	
	R::getRow( 'SELECT * FROM page WHERE title LIKE ? LIMIT 1',
        [ '%Jazz%' ]
    );
	
	
	R::getCell( 'SELECT title FROM page LIMIT 1' );
	
	
	R::getAssoc( 'SELECT id, title FROM page' );
	
	
	R::exec( 'INSERT INTO ... ' );
    $id = R::getInsertID();
	
	
	$sql = 'SELECT author.* FROM author
        JOIN club WHERE club.id = 7 ';
    $rows = R::getAll( $sql );
    $authors = R::convertToBeans( 'author', $rows );
	
	
	$newpass = '1234';
    $didResetPass = R::matchUp(
        'account',
        ' token = ? AND tokentime > ? ',
        [ $token, time()-100 ],
        [
            'pass' => $newpass,
            'token' => ''
        ],
        NULL,
        $account );
	
	
	R::csv( '
        SELECT city,popularity 
        FROM scores 
        WHERE score > ?
    ', [5], ['CITY','SCORE'] );
	
	
	list($book,$pages) = R::dispenseAll('book,page*2');
        $book->title = 'Old Book';
        $book->price = 999;
        $book->ownPageList = $pages;
        $pages[0]->text = 'abc';
        $pages[1]->text = 'def';
        R::store($book);
	
	
	$book->title = 'new Book';
        $page = end($book->ownPageList);
        $page->text = 'new';
	
	
	$oldBook = $book->fresh();
        $oldBook->ownPageList;
        $diff = R::diff($oldBook, $book);
	
	
	
	$books = R::getAll( 'SELECT 
    book.title AS title, 
    author.name AS author, 
    GROUP_CONCAT(category.name) AS categories FROM book
    JOIN author ON author.id = book.author_id
    LEFT JOIN book_category ON book_category.book_id = book.id
    LEFT JOIN category ON book_category.category_id = category.id 
    GROUP BY book.id
    ' );
    foreach( $books as $book ) {
        echo $book['title'];
        echo $book['author'];
        echo $book['categories'];
    }
	
	
	
	$fields = R::inspect( 'book' );
	
	
	$listOfTables = R::inspect();
	
	
	R::transaction( function() {
        ..store some beans..
    } );
	
	
	
	$rows = R::getRow( 'SELECT book.*, count( page.id ) AS meta_pages... ' );
    $book = R::convertToBean( 'book', $data, 'meta_' );
    $queryData = $book->getMeta('data.bundle');
    echo $queryData['meta_pages'];
	
	
	
	//Use tbl_book_category instead of tbl_book_tbl_category
    R::renameAssociation([
        'tbl_book_tbl_category' => 'tbl_book_category' 
    ]);
	
	
	
	
	R::bindFunc( 'read', 'location.point', 'asText' );
    R::bindFunc( 'write', 'location.point', 'GeomFromText' );

    $location = R::dispense( 'location' );
    $location->point = 'POINT(14 6)';

    //inserts using GeomFromText() function
    R::store( $location );

    //to unbind a function, pass NULL:
    R::bindFunc( 'read', 'location.point', NULL );
	
	
	
	
	R::resetQueryCount(); //reset counter
    R::getQueryCount(); //get number of queries processed by adapter
	
	
	
	R::startLogging(); //start logging
    $logs = R::getLogs(); //obtain logs
	
	
	$logs = R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();

    print_r( $logs->grep( 'SELECT' ) );
	
	
	
	
	R::usePartialBeans( TRUE );
	
	
	
	R::freeze( ['book','page','book_page'] );
	
	
	
	R::dump( $myBeans ) 
	
	
	
	//turns debugging ON (recommended way)
    R::fancyDebug( TRUE );
    //turns debugging ON (classic)
    R::debug( TRUE );
	R::debug( TRUE, 1 ); //select mode 1 to suppress screen output
    //turns debugging OFF
    R::debug( FALSE );
	
	
	
	R::trash( $book ); //for one bean
	R::trashAll( $books ); //for multiple beans
	R::wipe( 'book' ); //burns all the books!
	R::nuke();To destroy the entire database simply invoke the nuclear method (be careful!):
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$lifeCycle = '';
    class Model_Bandmember extends RedBean_SimpleModel {
        public function open() {
           global $lifeCycle;
           $lifeCycle .= "called open: ".$this->id;
        }
        public function dispense() {
            global $lifeCycle;
            $lifeCycle .= "called dispense() ".$this->bean;
        }
        public function update() {
            global $lifeCycle;
            $lifeCycle .= "called update() ".$this->bean;
        }
        public function after_update() {
            global $lifeCycle;
            $lifeCycle .= "called after_update() ".$this->bean;
        }
        public function delete() {
            global $lifeCycle;
            $lifeCycle .= "called delete() ".$this->bean;
        }
        public function after_delete() {
            global $lifeCycle;
            $lifeCycle .= "called after_delete() ".$this->bean;
        }
    }

    $bandmember = R::dispense( 'bandmember' );
    $bandmember->name = 'Fatz Waller';
    $id = R::store( $bandmember );
    $bandmember = R::load( 'bandmember', $id );

    R::trash( $bandmember );
    echo $lifeCycle;
	
	
	
	
	*/
	
}
