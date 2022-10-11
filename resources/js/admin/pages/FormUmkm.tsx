import React, { useEffect, useState, Fragment } from "react";
import DataTable from "react-data-table-component";
import { toast } from "react-toastify";
import { useNavigate, useParams } from "react-router-dom";
import { Dialog, Transition } from '@headlessui/react'

import axios from '@/axios'
import LoadingSpin from '@/components/LoadingSpin'
import { useAppSelector } from '@/redux/hooks'

interface Props {
    isEdit: boolean
}

interface FormError{
    name: string,
    jenisUsaha: string,
    address: string,
    whatsapp: string,
    phone: string,
    ig: string,
}

export default function FormUmkm({ isEdit }: Props) {

    const token = useAppSelector(state => state.auth.token)
    const navigate = useNavigate()
    const { id } = useParams()

    const [ name, setName ] = useState("");
    const [ jenisUsaha, setJenisUsaha ] = useState("");
    const [ address, setAddress] = useState("");
    const [ whatsapp, setWhatsapp ] = useState("");
    const [ phone, setPhone ] = useState("");
    const [ ig, setIg ] = useState("");
    const [ formErrors, setFormErrors ] = useState<Partial<FormError>>({});

    const [ isSubmitting, setSubmitting ] = useState(false);
    const [ isFetching, setFetching ] = useState(false);
    const [ isDeleting, setDeleting ] = useState(false);
    const [ modalOpen, setModalOpen ] = useState(false);

    const isLoading = isSubmitting || isFetching || isDeleting;

    useEffect(() => {
        if (!isEdit) return
        
        //fetch data
        (async () => {
            try {
                setFetching(true)
                const response = await axios({
                    url: `/umkm/${ id }`,
                    headers: {
                        Authorization: `Bearer ${ token }`
                    }
                })
                const data = response.data
                setName(data.name);
                setJenisUsaha(data.jenisUsaha);
                setAddress(data.address);
                setWhatsapp(data.whatsapp);
                setPhone(data.phone);
                setIg(data.ig);
            } catch (e: any){
                if (e.response?.status === 404) {
                    toast.error("UMKM Tidak ditemukan");
                    return navigate(-1);
                }
                toast.error("Terjadi kesalahan. Silakan coba lagi");
            } finally {
                setFetching(false)
            }
        })()
    }, [])

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        try {
            setSubmitting(true)
            await axios({
                method: isEdit ? 'PUT' : 'POST',
                url: isEdit ? `/umkm/${ id }` : '/umkm',
                headers: {
                    Authorization: `Bearer ${ token }`
                },
                data: { name, jenisUsaha, address, whatsapp, phone, ig }
            })
            toast.success("UMKM Berhasil disimpan!");
            navigate("/umkm")
        } catch (e: any) {
            if (e.response){
                if (e.response.status === 422) {
                    setFormErrors(e.response.data.errors)
                }
                toast.error(e.response.data.message)
            }
            else {
                toast.error("Terjadi kesalahan. Silakan Coba lagi");
            }
        } finally {
            setSubmitting(false)
        }
    }

    const handleDelete = async () => {
        try {
            setDeleting(true)
            await axios({
                method: 'DELETE',
                url: `/umkm/${ id }`,
                headers: {
                    Authorization: `Bearer ${ token }`
                },
            })
            toast.success("UMKM Berhasil dihapus!");
            navigate("/umkm")
        } catch (e: any) {
            if (e.response){
                toast.error(e.response.data.message)
            }
            else {
                toast.error("Terjadi kesalahan. Silakan Coba lagi");
            }
        } finally {
            setSubmitting(false)
        }
    }

    const closeModal = () => {
        if (isLoading) return //ignore if loading is in process
        setModalOpen(false)
    }

    return (
        <>
            {
                isFetching && (
                    <div className="flex-center flex-col text-white gap-2 fixed w-screen h-screen left-0 top-0 z-20 bg-black bg-opacity-70">
                        <LoadingSpin />
                        Memuat data...
                    </div>
                )
            }
            <h3 className="text-gray-700 text-3xl font-medium">{ isEdit ? "Edit" : "Buat" } UMKM</h3>
            <div className="flex flex-col mt-4">

                <form className="w-full p-4 rounded-md bg-white mt-4 flex flex-col gap-4" onSubmit={ handleSubmit }>
                    <div className="flex flex-col">
                        <label
                            htmlFor="name"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Nama Usaha
                        </label>
                        <input
                            id="name"
                            type="text"
                            disabled={isLoading}
                            value={ name }
                            onChange={ (e) => setName(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.name ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.name }</span>
                    </div>
                    <div className="flex flex-col">
                        <label
                            htmlFor="jenisUsaha"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Jenis Usaha
                        </label>
                        <input
                            id="jenisUsaha"
                            type="text"
                            disabled={isLoading}
                            value={ jenisUsaha }
                            onChange={ (e) => setJenisUsaha(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.jenisUsaha ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.jenisUsaha }</span>
                    </div>
                    <div className="flex flex-col">
                        <label
                            htmlFor="alamat"
                            className="font-semibold text-slate-700 required-sign"
                        >
                            Alamat
                        </label>
                        <input
                            id="alamat"
                            type="text"
                            disabled={isLoading}
                            value={ address }
                            onChange={ (e) => setAddress(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.address ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.address }</span>
                    </div>
                    <div className="flex flex-col">
                        <label
                            htmlFor="wa"
                            className="font-semibold text-slate-700"
                        >
                            WhatsApp
                        </label>
                        <input
                            id="wa"
                            type="text"
                            disabled={isLoading}
                            value={ whatsapp }
                            onChange={ (e) => setWhatsapp(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.whatsapp ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.whatsapp }</span>
                    </div>
                    <div className="flex flex-col">
                        <label
                            htmlFor="phone"
                            className="font-semibold text-slate-700"
                        >
                            No Telp
                        </label>
                        <input
                            id="phone"
                            type="text"
                            disabled={isLoading}
                            value={ phone }
                            onChange={ (e) => setPhone(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.phone ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.phone }</span>
                    </div>
                    <div className="flex flex-col">
                        <label
                            htmlFor="ig"
                            className="font-semibold text-slate-700"
                        >
                            Instagram
                        </label>
                        <input
                            id="ig"
                            type="text"
                            disabled={isLoading}
                            value={ ig }
                            onChange={ (e) => setIg(e.target.value) }
                            className={`w-full rounded-md border p-2 disabled:opacity-70 ${ formErrors.ig ? "border-red-500 focus:outline-red-500 bg-red-50" : "border-gray-300 focus:outline-ijo" }`}
                        />
                        <span className="text-red-500 text-sm font-semibold">{ formErrors.ig }</span>
                    </div>
                    <div className="flex gap-4">
                        <button className="btn disabled:opacity-70" disabled={ isLoading } type="submit">
                            { isSubmitting ? <><LoadingSpin /> Menyimpan...</> : "Simpan" }
                        </button>
                        {
                            isEdit && 
                            <button 
                                className="btn bg-white text-red-500 border border-red-500 focus:ring-red-500 focus:bg-red-600 focus:text-white hover:bg-red-500 hover:text-white" 
                                onClick={ () => setModalOpen(true) } 
                                disabled={ isLoading } 
                                type="button"
                            >
                                Hapus
                            </button>
                        }
                    </div>
                </form>

                <Transition appear show={modalOpen} as={Fragment}>
                    <Dialog as="div" className="relative z-10" onClose={closeModal}>
                        <Transition.Child
                            as={Fragment}
                            enter="ease-out duration-300"
                            enterFrom="opacity-0"
                            enterTo="opacity-100"
                            leave="ease-in duration-200"
                            leaveFrom="opacity-100"
                            leaveTo="opacity-0"
                        >
                            <div className="fixed inset-0 bg-black bg-opacity-25" />
                        </Transition.Child>

                        <div className="fixed inset-0 overflow-y-auto">
                            <div className="flex min-h-full items-center justify-center p-4 text-center">
                                <Transition.Child
                                    as={Fragment}
                                    enter="ease-out duration-300"
                                    enterFrom="opacity-0 scale-95"
                                    enterTo="opacity-100 scale-100"
                                    leave="ease-in duration-200"
                                    leaveFrom="opacity-100 scale-100"
                                    leaveTo="opacity-0 scale-95"
                                >
                                    <Dialog.Panel className="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                                    <Dialog.Title
                                        as="h3"
                                        className="text-lg font-medium leading-6 text-gray-900"
                                    >
                                        Apakah Anda yakin ingin menghapus UMKM { name }?
                                    </Dialog.Title>
                                    <div className="mt-2">
                                        <p className="text-sm text-gray-500">
                                            Data yang telah dihapus tidak dapat dikembalikan lagi
                                        </p>
                                    </div>

                                    <div className="flex gap-4 mt-4">
                                        <button className="btn disabled:opacity-70" disabled={ isLoading } onClick={ closeModal } type="button">
                                            Batal
                                        </button>
                                        <button 
                                            className="btn bg-white text-red-500 border border-red-500 focus:ring-red-500 focus:bg-red-600 focus:text-white hover:bg-red-500 hover:text-white" 
                                            onClick={ handleDelete } 
                                            disabled={ isLoading } 
                                            type="button"
                                        >
                                            { isDeleting ? <><LoadingSpin /> Menghapus...</> : "Hapus" }
                                        </button>
                                    </div>
                                    </Dialog.Panel>
                                </Transition.Child>
                            </div>
                        </div>
                    </Dialog>
                </Transition>
            </div>
        </>
    );
}
