import React from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter,Route } from 'react-router-dom';


// compoents
import Home from './components/home';
import Posts from './components/posts';
import Profile from './components/profile';

const App = () => {
	return (
		<BrowserRouter>
			<Route/>
		</BrowserRouter>

		)
}

ReactDom.render(
	<App/>,
	document.querySelector('#root')

)