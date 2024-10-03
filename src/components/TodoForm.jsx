import React,{useState} from 'react'
import { useTodo } from '../context'



function TodoForm() {
  const [todoMsg, setTodoMsg] = useState("")
  const { addTodo } = useTodo()
  const add = (e) => {
    e.preventDefault()
    if (todoMsg) addTodo({text:todoMsg, completed:false}) ; setTodoMsg("")
    return  
  }
  
  return (
    <>
    <form className='flex' onSubmit={add}>
      <input 
      type="text"
      className="w-full border border-black/10 rounded-l-lg px-3 outline-none duration-150 bg-white/20 py-1.5"
      placeholder='Write todo here ...'
      value={todoMsg}
      onChange={(e)=> setTodoMsg(e.target.value)}
      />
      <input type='submit' className="rounded-r-lg px-3 py-1 bg-green-600 text-white shrink-0" value='add'/>
    </form>
    </>
  )
}

export default TodoForm
