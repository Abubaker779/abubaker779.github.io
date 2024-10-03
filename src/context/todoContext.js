import { createContext, useContext } from "react";

export const todoContext = createContext({
    todos: [],
    addTodo: (todo)=>{},
    updateTodo: (id,todo)=>{},
    deleteTodo: (id)=>{},
    toggleTodo: (id)=>{}
})

export const useTodo = () => {
    return useContext(todoContext)
}

export const  TodoProvider = todoContext.Provider