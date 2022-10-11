import { createSlice } from '@reduxjs/toolkit';

export interface AuthInterface {
    token: string,
    name: string,
    role: string,
}

const initialState: AuthInterface = {
    token: "",
    name: "",
    role: "",

}

export const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {
        setToken: (state, action) => {
            state.token = action.payload;
        },

        setName: (state, action) => {
            state.name = action.payload;
        },

        setRole: (state, action) => {
            state.role = action.payload;
        },

        setAuthData: (state, action) => {
            return {
                ...state,
                ...action.payload,
            }
        },

        logout: (state) => {
            state.token = "";
            state.name = "";
            state.role = "";
        }
    }
})

export const { setToken, setName, logout, setRole, setAuthData, } = authSlice.actions;

export default authSlice.reducer