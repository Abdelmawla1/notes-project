<?php

use Core\Container;

//test('example', function () {
//    expect(true)->toBeTrue();
//});

test('it can resolve something out of the Container',function(){

    // arrange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    // act
    $result = $container->resolve('foo');

    // assert/ expect
    expect($result)->toEqual('bar');

});
