<?php

use Mockery as m;
use Way\Tests\Factory;

class AcquiredfeaturesTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'AcquiredFeature');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::AcquiredFeature(['id' => 1]);
		$this->app->instance('AcquiredFeature', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'AcquiredFeatures');

		$this->assertViewHas('AcquiredFeatures');
	}

	public function testCreate()
	{
		$this->call('GET', 'AcquiredFeatures/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'AcquiredFeatures');

		$this->assertRedirectedToRoute('AcquiredFeatures.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'AcquiredFeatures');

		$this->assertRedirectedToRoute('AcquiredFeatures.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'AcquiredFeatures/1');

		$this->assertViewHas('AcquiredFeature');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'AcquiredFeatures/1/edit');

		$this->assertViewHas('AcquiredFeature');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'AcquiredFeatures/1');

		$this->assertRedirectedTo('AcquiredFeatures/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'AcquiredFeatures/1');

		$this->assertRedirectedTo('AcquiredFeatures/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'AcquiredFeatures/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
