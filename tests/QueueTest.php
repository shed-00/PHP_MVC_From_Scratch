<?php
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
    
    protected static $queue;
    
    /**
     * METHOD: setUp
     * Empty the $queue before each test method
     */
    protected function setUp(): void
    {
        static::$queue->clear();        
    }
    
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;        
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;        
    }    
        
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('green');
        
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');
                
        $item = static::$queue->pop();
        
        $this->assertEquals(0, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }
    
    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');
        
        $this->assertEquals('first', static::$queue->pop());
    }    
}