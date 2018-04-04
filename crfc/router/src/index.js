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
			<div>
				<header>Header</header>
				<Route path="/" exact component={Home}/>
				<Route path="/posts" component={Posts}/>
				<Route path="/profiles" component={Profile}/>
			</div>
		</BrowserRouter>

		)
}

ReactDom.render(
	<App/>,
	document.querySelector('#root')

)