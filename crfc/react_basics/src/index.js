import React from 'react';
import ReactDOM from 'react-dom';

// components

import Header from './components/header';


const App = () =>{
	// return React.createElement('h1',{className:'example'},'Hello World')
	//funciona contanto que esteja tudo dentro de apenas uma tag
	
	return (
		<div>
			<Header/>
		</div>

		)
}
ReactDOM.render(<App/>,document.querySelector('#root'));