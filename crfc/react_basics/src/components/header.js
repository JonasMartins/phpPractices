import React,{Component} from 'react';
import '../css/styles.css'

class Header extends Component {
	
	state = {
		keywords:'Hello'
	}

	inputChangeHandler = (event) =>
	{
		this.setState({
			keywords:event.target.value
		})
	}


	render(){

		
		return (
			<header>
				<div className="logo">Logo</div>
				<input type="text" onChange={this.inputChangeHandler}/>
			</header>
			)

	}
}


// the name of component to share with another components
export default Header;