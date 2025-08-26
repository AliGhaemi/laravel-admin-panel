import { configureStore } from "@reduxjs/toolkit";
import counterReducer from './features/counterSlice.js'

export default configureStore({
    reducer: {
        counter: counterReducer
    }
})
