import React, {Component} from 'react';

class Life extends Component {
	// 1 get default props
	
	// 2 get default state 

	// 3  before render
	componentWillMount(){
		console.log('Before render')
	}
	// 4 redner jsx
	
	render(){
		return (
			<div>
				<h3>Life Cycles</h3>
			</div>
		)
	}

	// 5 after jsx
	componentDidMount(){
		console.log('After render')
	}

}

export default Life;