<?php
class BlogTest extends \PHPUnit\Framework\TestCase{
    public function testIniPage(){
        $blog = new pages\blog\Blog;
        $result = $blog->huhu();

        $this->assertEquals('ok1', $result);
    }
}