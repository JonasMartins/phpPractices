

class Car {
	constructor()
	{
		this.wheels=4;
		this.type='Hatchbag'
	}
}

class Ford  extends Car{
	constructor()
	{	
		super(); // import from super
		this.windows=4;
	}
}

const car = new Car();
const ford = new Ford();

//console.log(ford.wheels);