import React, {useState} from "react";
import DbTableItem from "@/Pages/DbTableItem";

export default function DbTableList({tableNames}) {
    console.log(tableNames)

    return (
        <div className="">
            <ul className="grid gap-2">
                {tableNames.map((item, index) => (
                    <DbTableItem key={index} item={item}/>
                ))}
            </ul>
        </div>
    );
}
