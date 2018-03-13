import React from 'react';
import ReactDOM from 'react-dom';

const App = () =>{
	// return React.createElement('h1',{className:'example'},'Hello World')
	//funciona contanto que esteja tudo dentro de apenas uma tag
	
	return (
		<div className='example'>
			<h1>Hello World</h1>
			<p>Test</p>
		</div>
		)
}

ReactDOM.render(<App/>,document.querySelector('#root'));