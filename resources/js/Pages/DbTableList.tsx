import React, {useState} from "react";
import DbTableItem from "@/Pages/DbTableItem";

export default function DbTableList({CategorizedTableNames, UncategorizedTableNames, className}) {
    console.log(CategorizedTableNames)

    return (
        <div className={className}>
            <ul className="grid gap-2">
                <>
                    {CategorizedTableNames.map((item, index) => (
                        <>
                            <div className="flex flex-row gap-3 items-center my-5 first:mt-3">
                                <h1 className="text-2xl">{item.name}</h1>
                                <div className="border-b-1 border-b-utility w-full"/>
                            </div>
                            {item.table_names.map((table_name, indexTableName) => (
                                <DbTableItem key={indexTableName} item={table_name.name}/>
                            ))}
                        </>
                    ))}
                    <div className="flex flex-row gap-3 items-center my-5">
                        <h1 className="text-2xl">Uncategorized</h1>
                        <div className="border-b-1 border-b-utility w-full"/>
                    </div>
                    {UncategorizedTableNames.map((item, index) => (
                        <>
                            <DbTableItem key={index} item={item.name}/>
                        </>
                    ))}
                </>
            </ul>
        </div>
    );
}
