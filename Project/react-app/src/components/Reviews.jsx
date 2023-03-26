import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Reviews = () => {
    const [data, setData] = useState("");

    useEffect(() => {
        axios.get("http://localhost:8000/reviews.php").then((response) => {
            setData(response.data);
            console.log(response.data);
        });
    }, []);

    return (
        <div
            dangerouslySetInnerHTML={{ __html: data }}
        />
    );
}

export default Reviews;