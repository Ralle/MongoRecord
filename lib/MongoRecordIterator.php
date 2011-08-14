<?php

class MongoRecordIterator implements Iterator
{
  protected $cursor;
  protected $className;
  
  public function __construct(MongoCursor $cursor, $className)
  {
    $this->cursor = $cursor;
    $this->className = $className;
  }
  
  public function current()
  {
    $className = $this->className;
    $data = $this->cursor->current();
    $ele = new $className($data, false);
    return $ele;
  }
  
  public function key()
  {
    return $this->cursor->key();
  }
  
  public function next()
  {
    $this->cursor->next();
  }
  
  public function rewind()
  {
    $this->cursor->rewind();
  }
  
  public function valid()
  {
    return $this->cursor->valid();
  }
}

?>