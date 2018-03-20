import React,{Component} from 'react';
import '../css/styles.css'


class Header extends Component {
	
	inputChangeHandler(event)
	{
		// event is a json object
		console.log(event.target.value)
	}


	render(){

		return (
			<header>
				<div className="logo">Logo</div>

				<input type="text" onChange={(e) => this.inputChangeHandler(e)}/>
			</header>
			)

	}
}


// the name of component to share with another components
export default Header;