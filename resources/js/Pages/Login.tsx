import {PlaceholderPattern} from '@/Components/placeholder-pattern';
import {type BreadcrumbItem} from '@/types';
import {Form, Head} from '@inertiajs/react';

export default function Login() {
    return (
        <div className="h-screen flex items-center justify-center">
            <Head title="Login"/>
            <Form
                method="post"
                action={route('login')}
                className="dark:text-font text-xl space-y-6 w-80"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="flex flex-col w-full">
                            <label htmlFor="user_email" className="block mb-1">Email Address</label>
                            <input type="email" id="user_email" name="email" placeholder="type email" required
                                   className="border rounded-sm mt-1 p-2 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"/>
                        </div>
                        <div className="flex flex-col w-full">
                            <label htmlFor="user_password" className="block mb-1">Password</label>
                            <input type="password" id="user_password" name="password" placeholder="type password" required
                                   className="border rounded-sm mt-1 p-2 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"/>
                        </div>
                        <button
                            type="submit" className="bg-utility hover:bg-hover text-font font-bold rounded h-12 mt-3 mr-3 w-full"
                        >Register</button>
                        {console.log(errors)}
                    </>
                )}
            </Form>
        </div>
    );
}
