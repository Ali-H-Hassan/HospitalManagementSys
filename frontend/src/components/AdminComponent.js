import React, { useEffect, useState } from "react";
import axios from "axios";

const AdminComponent = () => {
  const [data, setData] = useState([]);

  useEffect(() => {
    // Implement JWT authentication
    const token = localStorage.getItem("jwt");

    axios
      .get("http://localhost/api/admin", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        setData(response.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }, []);

  return (
    <div>
      <h1>Admin Dashboard</h1>
    </div>
  );
};

export default AdminComponent;
