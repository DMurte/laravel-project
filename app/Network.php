<?php
namespace App;
use Baum;

/**
* Network
*/
class Network extends Baum\Node {

  public $timestamps = false;
  /**
   * Table name.
   *
   * @var string
   */
  protected $table = 'networks';

  // 'parent_id' column name
  protected $parentColumn = 'parent_id';

  // 'lft' column name
  protected $leftColumn = 'lft';

  // 'rgt' column name
  protected $rightColumn = 'rgt';

  // 'depth' column name
  protected $depthColumn = 'depth';

  // guard attributes from mass-assignment
  protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth','data','user_id');

}
