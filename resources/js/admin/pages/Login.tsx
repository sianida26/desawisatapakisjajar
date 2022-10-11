import React, { useEffect, useState } from 'react'

import { Link } from "react-router-dom"

import { useAppDispatch } from '@/redux/hooks';
import { setAuthData } from '@/redux/slices/authSlice';

import axios from '@/axios';
import LoadingSpin from '@/components/LoadingSpin'

export default function Login() {

    const dispatch = useAppDispatch()

    const [isLoading, setLoading] = useState(false)
    const [errorMsg, setErrorMsg] = useState("")
    const [email, setEmail] = useState("")
    const [password, setPassword] = useState("")

    useEffect(() => {
        document.title = "Login - Desa Wisata Pakisjajar"
    }, [])

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setErrorMsg("")
        setLoading(true)

        try {
            const response = await axios({
                url: '/auth/login',
                method: 'POST',
                data: { 
                    email, 
                    password,
                }
            })
            dispatch(setAuthData({
                name: response.data.name,
                token: response.data.token,
                role: response.data.role,
            }))
        } catch (e: any){
            if (e.response){
                setErrorMsg(e.response.data.message);
                return;
            }
            setErrorMsg(`Terjadi kesalahan. Silakan coba lagi.`);
        } finally {
            setLoading(false)
        }
    }

    return (
        <div className="w-screen h-screen bg-slate-100 flex-center px-4">

            {/* card */}
            <div className="w-full bg-white rounded-md shadow-lg p-8 border flex flex-col items-center md:max-w-sm">
                <h1 className="text-center font-bold text-xl">Masuk ke Dashboard</h1>

                { errorMsg && <span className="w-full bg-red-500 text-white text-center mt-8 rounded-md p-2 text-sm font-semibold">{ errorMsg }</span> }
                
                <form 
                    onSubmit={ handleSubmit }
                    className="flex flex-col mt-8 w-full gap-4"
                >
                    <div className="flex flex-col">
                        <label htmlFor="email" className="font-semibold text-slate-700">Email</label>
                        <input 
                            id="email"
                            type="email"
                            autoComplete="email"
                            disabled={ isLoading }
                            value={ email }
                            onChange={ (e) => setEmail(e.target.value)}
                            className="w-full rounded-md border p-2 border-gray-300 focus:outline-ijo disabled:opacity-70"
                        />
                    </div>

                    <div className="flex flex-col">
                        <label htmlFor="password" className="font-semibold text-slate-700">Password</label>
                        <input 
                            id="password"
                            type="password"
                            autoComplete="password"
                            disabled={ isLoading }
                            value={ password }
                            onChange={ (e) => setPassword(e.target.value) }
                            className="w-full rounded-md border p-2 border-gray-300 focus:outline-ijo disabled:opacity-70"
                        />
                    </div>

                    <button
                        type="submit"
                        className="btn mt-4 font-bold disabled:opacity-70"
                        disabled={ isLoading }
                    >
                        {
                            isLoading ? <><LoadingSpin /> Loading...</>
                            : "Masuk"
                        }
                    </button>
                </form>

                <div className="text-left mt-4">
                    Belum punya akun? <Link to="/register" className="text-blue-500 font-medium focus:outline-none focus:font-bold focus:ring-blue-500 focus:ring-2 focus:ring-offset-2 focus:rounded-md">Daftar Sekarang</Link>
                </div>
            </div>
        </div>
    )
}
