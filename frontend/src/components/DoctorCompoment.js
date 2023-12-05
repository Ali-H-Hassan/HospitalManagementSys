import React, { useEffect, useState } from "react";
import axios from "axios";

const DoctorComponent = () => {
  const [patientRecords, setPatientRecords] = useState([]);

  useEffect(() => {
    // Implement JWT authentication
    const token = localStorage.getItem("jwt");

    axios
      .get("http://localhost/api/doctor/patient-records", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        setPatientRecords(response.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }, []);

  return (
    <div>
      <h1>Doctor Dashboard</h1>
      <h2>Patient Records</h2>
      <ul>
        {patientRecords.map((patient) => (
          <li key={patient.id}>
            {patient.name} - {patient.illness}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default DoctorComponent;
