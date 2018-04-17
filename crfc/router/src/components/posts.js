import React from 'react';
import { Link } from 'react-router-dom';


const Posts = () => {
	
	// const ids = [
	// 	{id:'1',name:'Post1'},
	// 	{id:'2',name:'Post2'},
	// 	{id:'3',name:'Post3'}
	// ] 
	// old way 
	// const list = ids.map( item=> {
	// 	return (
	// 			<span key={item.id} >
	// 				<Link to={item.id}>{item.name}</Link><br />
	// 			</span>
	// 		)
	// })

	// return ids.map( item=> {
	// 	return (
	// 			<span key={item.id} >
	// 				<Link to={item.id}>{item.name}</Link><br />
	// 			</span>
	// 		)
	// })

	return [
		"Hello",
		" i am",
		"a react app"
	]

}

export default Posts;