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
    if ($data)
    {
      return new $className($data, false);
    }
    return null;
  }
  
  // allows for skip() limit() and the like
  // it would be able to replace key() next(), but those are required for this
  // to be an iterator.
  public function __call($name, array $arguments = array())
  {
    return call_user_func_array(array($this->cursor, $name), $arguments);
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