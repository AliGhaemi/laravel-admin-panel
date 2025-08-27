import React, {useState} from "react";
import {Link} from "@inertiajs/react";

export default function DbTableItem({item}: {item: string}) {
    return (
        <li className="flex items-center bg-secondary rounded-xl h-16 w-full px-3">
            <div className="flex justify-center gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                     stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round"
                          d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                </svg>
                <p className="font-bold">{item}</p>
            </div>
            <div className="ml-auto grid grid-cols-2 gap-3">
                <Link
                    href={`${window.location.pathname}/${item}`}
                    className="bg-utility rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer"
                >
                    View Rows
                </Link>
                <div className="bg-utility rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer">Add</div>
            </div>
        </li>
    );
}
