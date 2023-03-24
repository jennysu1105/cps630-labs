import React, { useEffect, useState } from 'react';
import axios from 'axios';
import $ from 'jquery';
import '../static/css/DBMaintain.css';

const Insert = () => {
    const [data, setData] = useState("");

    useEffect(() => {
        axios.get("http://localhost:8000/insertPage.php").then((response) => {
            setData(response.data);
            console.log(response.data);
        });
    }, []);

    return (
        <div class="container">
            <div class="row">
                <h3 class="mt-4 mb-4">Insert Table</h3>
            </div>
            <div
                dangerouslySetInnerHTML={{ __html: data }}
            />
        </div>
    );
}

export default Insert;