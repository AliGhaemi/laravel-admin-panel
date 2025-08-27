import {type BreadcrumbItem} from '@/types';
import ProfileImage from '../../images/jpgs/profile-picture.jpg';
import DatabaseSvg from '../../images/svgs/database.svg';
import FileSvg from '../../images/svgs/file.svg';
import HomeSvg from '../../images/svgs/home.svg';
import SettingsSvg from '../../images/svgs/settings.svg';
import PlaySvg from '../../images/svgs/play.svg';
import {Link} from "@inertiajs/react";

export default function Sidebar() {
    return (
        <aside className="w-90 fixed h-full left-0 dark:bg-secondary dark:text-font">
            <div className="flex flex-col gap-y-4 self-start w-90 h-full p-2">
                <header className="p-5 border-b border-hover" id="sidebar-header">
                    <a href="/">
                        <div className="flex justify-items-start space-x-6 items-center">
                            <img className="rounded-xl h-12" src={ProfileImage}
                                 alt="HomePage"/>
                            <div>
                                <p className="font-bold text-sm" id="first">{"Admin User -> John Doe"}</p>
                                <p className="text-sm" id="second">Full Permission</p>
                            </div>
                        </div>
                    </a>
                </header>
                <div className="flex flex-1 p-5" id="sidebar-items">
                    <ol className="flex flex-col flex-1 space-y-3 text-sm font-bold">
                        <li className="">
                            <Link
                                href="/"
                                className="relative flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md"
                            >
                                <img
                                    style={{filter: 'invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)'}}
                                    className="h-6 w-6 my-auto" src={HomeSvg}
                                    alt="Dashboard Logo"/>
                                <p className="my-auto">Dashboard</p>
                            </Link>
                        </li>
                        <li className="">
                            <Link
                                href={route('admin.handle')}
                                className="relative flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md"
                            >
                                <img
                                    style={{filter: 'invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)'}}
                                    className="h-6 w-6 my-auto" src={DatabaseSvg}
                                    alt="Database Logo"/>
                                <p className="my-auto">Database Manager</p>
                            </Link>
                        </li>
                        <li className="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                            <img
                                style={{filter: 'invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)'}}
                                className="h-6 w-6 my-auto" src={FileSvg} alt="File Logo"/>
                            <a className="my-auto" href="#">Storage</a>
                        </li>
                        <li className="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                            <img
                                style={{filter: 'invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)'}}
                                className="h-6 w-6 my-auto" src={PlaySvg} alt="Play Logo"/>
                            <a className="my-auto" href="#">Ai Apps</a>
                        </li>
                        <li className="flex flex-row gap-x-5 p-3 mt-auto hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                            <img
                                style={{filter: 'invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)'}}
                                className="h-6 w-6 my-auto" src={SettingsSvg}
                                alt="Settings Logo"/>
                            <a className="my-auto" href="#">Settings</a>
                        </li>
                    </ol>
                </div>
            </div>
        </aside>
    );
}
