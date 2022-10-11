import React, { useState } from "react";
import { Link, Outlet, useLocation } from "react-router-dom";

import { BiMenuAltLeft } from "react-icons/bi";
import { BsPersonCircle, BsShop } from "react-icons/bs";
import { MdGroups } from "react-icons/md";

import logo from "@/assets/logo_2.png";

import { Popover } from '@headlessui/react'

export default function Dashboard() {

    const { pathname } = useLocation();
    const [ sidebarOpen, setSidebarOpen ] = useState(false)

    const isActive = (rootUrl: string) => {
        return pathname.indexOf(rootUrl) === 0
    }

    return (
        <div className="flex h-screen bg-gray-200">
            {/* sidebar backdrop */}
            <div 
                className={`fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden ${ sidebarOpen ? 'block' : 'hidden' }`}
                onClick={ () => setSidebarOpen(false) }
            >

            </div>
            {/* sidebar */}
            <div className={`fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gray-100 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0 ${ sidebarOpen ? "translate-x-0 ease-out" : "-translate-x-full ease-in" }`}>
                <a href="/" className="flex items-center justify-center mt-8 px-8">
                    <img className="w-full" src={ logo } />
                </a>
                <nav className="mt-10">
                    <Link to="/warga" onClick={ () => setSidebarOpen(false) } className={`flex items-center px-6 py-2 mt-4 ${ isActive('/warga') ? "text-gray-100 bg-ijo" : "text-gray-700 hover:bg-ijo hover:bg-opacity-75 hover:text-white" }`}>
                        <MdGroups className="text-2xl mr-2" />
                        Data Warga
                    </Link>
                    <Link to="/umkm" onClick={ () => setSidebarOpen(false) } className={`flex items-center px-6 py-2 ${ isActive('/umkm') ? "text-gray-100 bg-ijo" : "text-gray-700 hover:bg-ijo hover:bg-opacity-75 hover:text-white" }`}>
                        <BsShop className="text-2xl mr-2" />
                        Data UMKM
                    </Link>
                </nav>
            </div>
            <div className="flex flex-1 flex-col overflow-hidden">
                <header className="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-ijo text-gray-700">
                    <div className="flex items-center">
                        <BiMenuAltLeft className="text-3xl" onClick={ () => setSidebarOpen(!sidebarOpen) } />
                    </div>
                    <div>
                        <Popover className="relative">
                            <Popover.Button className="focus:outline-none">
                                <BsPersonCircle className="text-2xl" />
                            </Popover.Button>
                            <Popover.Panel className="absolute z-10 bg-white px-4 py-2 rounded-md shadow-md border right-1/2 hover:bg-gray-100">
                                <Link to="/logout">Keluar</Link>
                            </Popover.Panel>
                        </Popover>
                    </div>
                </header>
                <main className="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div className="container mx-auto px-6 py-8">
                        <Outlet />
                    </div>
                </main>
            </div>
        </div>
    );
}
