import React from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter,Route,Link } from 'react-router-dom';


// compoents
import Home from './components/home';
import Posts from './components/posts';
import Profile from './components/profile';

const App = () => {
	return (
		<BrowserRouter>
			<div>
				<header>
					<Link to="/">Home</Link><br/>
					<Link to="/posts">Posts</Link><br/>
					<Link to={{
						pathname:'/prfiles'
					}}>Profile</Link><br/> 
					<hr/>
				</header>
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