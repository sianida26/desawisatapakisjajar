import React, { useState } from "react";
import { Link } from "react-router-dom";
import { toast } from 'react-toastify';

import axios from "@/axios";
import LoadingSpin from "@/components/LoadingSpin";
import { useAppDispatch } from "@/redux/hooks";
import { setAuthData } from "@/redux/slices/authSlice";

export default function Register() {

    const dispatch = useAppDispatch()

    const [ errorMsg, setErrorMsg ] = useState("")
    const [ isLoading, setLoading ] = useState(false)
    const [ name, setName ] = useState("")
    const [ nameError, setNameError ] = useState("")
    const [ email, setEmail ] = useState("")
    const [ emailError, setEmailError ] = useState("")
    const [ password, setPassword ] = useState("")
    const [ passwordError, setPasswordError ] = useState("")
    const [ passwordConfirmation, setPasswordConfirmation ] = useState("")

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault()
        setLoading(true)

        try {
            const response = await axios({
                url: '/auth/register',
                method: 'POST',
                data: { 
                    name, 
                    email, 
                    password, 
                    password_confirmation: passwordConfirmation,
                }
            })
            dispatch(setAuthData({
                name: response.data.name,
                token: response.data.token,
                role: response.data.role,
            }))
            toast.success("Berhasil terdaftar");
        } catch (e: any){
            if (e.response){
                setErrorMsg(e.response.data.message);
                if (e.response.status === 422){
                    setNameError(e.response.data.errors.name?.[0]);
                    setEmailError(e.response.data.errors.email?.[0]);
                    setPasswordError(e.response.data.errors.password?.[0]);
                }
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
            <div className="w-full bg-white rounded-md shadow-lg p-8 border flex flex-col items-center md:max-w-screen-sm">
                <h1 className="text-center font-bold text-xl">
                    Daftar
                </h1>

                {errorMsg && (
                    <span className="w-full bg-red-500 text-white text-center mt-8 rounded-md p-2 text-sm font-semibold">
                        {errorMsg}
                    </span>
                )}

                <form
                    onSubmit={handleSubmit}
                    className="flex flex-col mt-8 w-full gap-4"
                >
                    <div className="flex flex-col">
                        <label
                            htmlFor="name"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Nama
                        </label>
                        <input
                            id="name"
                            type="text"
                            autoComplete="fullname"
                            disabled={isLoading}
                            value={ name }
                            onChange={ (e) => setName(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ nameError ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ nameError }</span>
                    </div>

                    <div className="flex flex-col">
                        <label
                            htmlFor="email"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            autoComplete="email"
                            disabled={isLoading}
                            value={ email }
                            onChange={ (e) => setEmail(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ emailError ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ emailError }</span>
                    </div>

                    <div className="flex flex-col">
                        <label
                            htmlFor="password"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            autoComplete="password"
                            disabled={isLoading}
                            value={ password }
                            onChange={ (e) => setPassword(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ passwordError ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ passwordError }</span>
                    </div>

                    <div className="flex flex-col">
                        <label
                            htmlFor="password-confirmation"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Ulangi Password
                        </label>
                        <input
                            id="password-confirmation"
                            type="password"
                            autoComplete="off"
                            disabled={isLoading}
                            value={ passwordConfirmation }
                            onChange={ (e) => setPasswordConfirmation(e.target.value) }
                            className="w-full rounded-md border p-2 border-gray-300 focus:outline-ijo disabled:opacity-70"
                        />
                    </div>

                    <button
                        type="submit"
                        className="btn mt-4 font-bold disabled:opacity-70"
                        disabled={isLoading}
                    >
                        {isLoading ? (
                            <>
                                <LoadingSpin /> Loading...
                            </>
                        ) : (
                            "Daftar"
                        )}
                    </button>
                </form>

                <div className="text-left mt-4">
                    Sudah punya akun?{" "}
                    <Link
                        to="/login"
                        className="text-blue-500 font-medium focus:outline-none focus:font-bold focus:ring-blue-500 focus:ring-2 focus:ring-offset-2 focus:rounded-md"
                    >
                        Masuk
                    </Link>
                </div>
            </div>
        </div>
    );
}
