import {PlaceholderPattern} from '@/Components/placeholder-pattern';
import {type BreadcrumbItem} from '@/types';
import {Form, Head} from '@inertiajs/react';

export default function Register() {
    return (
        <>
            <Head title="Dashboard"/>
            <Form
                method="post"
                action={route('register')}
            >
                <div>
                    <label htmlFor="user_name">Username</label>
                    <input type="text" id="user_name" name="user_name" placeholder="user_name" required/>
                </div>
                <div>
                    <label htmlFor="user_email">Username</label>
                    <input type="text" id="user_email" name="user_email" placeholder="user_email" required/>
                </div>
                <div>
                    <label htmlFor="user_password">Username</label>
                    <input type="text" id="user_password" name="user_password" placeholder="user_password" required/>
                </div>
            </Form>
        </>
    );
}
