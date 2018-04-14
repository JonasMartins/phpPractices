import React, {Component} from 'react';

class Life extends Component {
	state = {
		title: "Life Cycle"
	}

	// 1 get default props
	
	// 2 get default state 

	// 3  before render
	componentWillMount(){
		console.log('Before render')
	}
	// 4 redner jsx
	
	componentWillUpdate(){
		console.log('Before Update')
	}

	componentDidUpdate(){
		console.log('After Update')
	}

	shouldComponentUpdate(nextProps, nextState){
		// check previous and next state and choose if it should or shouldn't update
		// if return false will not update, true otherwise 
		console.log(this.state.title);
		console.log(nextState.title);
		if(nextState.title === 'Something else')
			return false
		return true;
	}

	componentWillReceiveProps(){
		console.log('Before receive props')

	}

	componentWillUnmount(){
		console.log('Unmount')
		
	}

	render(){
		console.log('Render')
		return (
			<div>
				<h3>{this.state.title}</h3>
				<div> onClick={ () => this.state({
					title:'Something else'
				}) }click to change</div>
			</div>
		) 
	}

	// 5 after jsx
	componentDidMount(){
		console.log('After render')
	}

}

export default Life;