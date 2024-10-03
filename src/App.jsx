import { useCallback, useEffect, useState } from "react"
import Todo from "./components/Todo"
import TodoForm from "./components/TodoForm"
import { TodoProvider } from "./context"
import {v4 as uuidv4 } from 'uuid';

function App() {
  
  const [m, setM]=useState(1)
  const [n, setN]=useState(5)
  const [todos, setTodos] = useState([])
  
  const addTodo = (todo) => {
    setTodos(prev => [{id:uuidv4(),...todo},...prev])
  }
  const updateTodo = (id,todo) => {
    setTodos(prev => prev.map((prevTodo) => prevTodo.id === id ? todo : prevTodo))
  }
  const deleteTodo = (id) => {
    setTodos(prev => prev.filter(todo => todo.id !== id ))
  }
  const toggleTodo = (id) => {
    setTodos(prev => prev.map((todo) => (todo.id === id ? { ...todo, completed: !todo.completed} :todo)))
  }
  
  // useEffect(()=>{const data = JSON.parse(localStorage.getItem('todos')); if(data) setTodos(data)},[])
  // useEffect(()=>{if (todos && todos.length>0 ) localStorage.setItem('todos',JSON.stringify(todos))},[todos])
  
  useEffect(() => {
    const data = localStorage.getItem('todos'); // Get the data as a string
    if (data) {
      setTodos(JSON.parse(data)); // Parse the JSON string to an array/object
    }
  }, []);
  
  useEffect(() => {
    if (todos && todos.length > 0) {
      localStorage.setItem('todos', JSON.stringify(todos)); // Convert the todos array/object back to a string
    } else {
      localStorage.removeItem('todos'); // Remove the key if todos is empty
    }
  }, [todos]);

  return (
   <TodoProvider value={{todos, addTodo, updateTodo, deleteTodo, toggleTodo}}>

<div className="bg-[#172842] min-h-screen py-8">
        <div className="flex justify-center ">
        <button onClick={()=>{

      for (let i=m;i<=n;i++) addTodo({text:`todo item ${i}`, completed:false})
      setM(n+1)
      setN(n+5)

    }}
    className="rounded px-3 py-1 bg-green-600 text-white shrink-0"
    >
      autoadd
    </button>
    <button onClick={()=>{
      todos.map((todo) => deleteTodo(todo.id))
    }}
    className="rounded px-3 py-1 bg-green-600 text-white shrink-0"
    >
      autodelete
    </button>
        </div>
        <div className="w-full max-w-2xl mx-auto shadow-md rounded-lg px-4 py-3 text-white">
            <h1 className="text-2xl font-bold text-center mb-8 mt-2">Manage Your Todos</h1>
            <div className="mb-4">
                {/* Todo form goes here */} 
                <TodoForm />
            </div>
            <div className="flex flex-wrap gap-y-3">
              {/* Loop and Add TodoItem here */}
              {todos.map((todo)=>(
                <div key={`%${todo.id}`} className="w-full text-">
                  <Todo todo={todo}/>
                </div>
              ))}
            </div>
        </div>
      </div>
   </TodoProvider>
  )
}

export default App
