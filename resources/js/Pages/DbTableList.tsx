import React, {useState} from "react";
import DbTableItem from "@/Pages/DbTableItem";

export default function DbTableList() {
    const dummyData = ['User', 'Profile', 'Comment']

    return (
        <div className="">
            <ul className="grid gap-2">
                {dummyData.map((item, index) => (
                    <DbTableItem item={item}/>
                ))}
            </ul>
        </div>
    );
}
