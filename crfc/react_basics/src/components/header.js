import React,{Component} from 'react';
import '../css/styles.css'


class Header extends Component {
	
	render(){

		// Kind of style
		// const styles = {
		// 	header:{
		// 		background:'#03a9f4'
		// 	},
		// 	logo: {
		// 		color:'#fff',
		// 		fontFamily:'Anton',
		// 		textAlign:'center'
		// 	}
		// } 

		return (
			<header>
				<div className="logo">Logo</div>
				<input type="text" />
			</header>
			)

	}
}


// the name of component to share with another components
export default Header;